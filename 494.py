class Solution:
    def findTargetSumWays(self, nums , S: int) -> int:
        pre = {0: 1}
        _max = sum(nums)  # 剩下的数字全为正能达到的最大和
        for i in nums:
            new = {}
            _max -= i
            for j, count in pre.items():
                adds = j+i
                if adds - _max <= S <= adds + _max:  # 剪枝
                    new[adds] = new.get(adds, 0) + count
                adds = j-i
                if adds - _max <= S <= adds + _max:  # 剪枝
                    new[adds] = new.get(adds, 0) + count
            pre = new
            res = list(pre.values())
        return res[0] if res else 0


    def findTargetSumWays2(self, nums, S: int) -> int:

        def dfs(cur, i, d = {}):

            if i < len(nums) and (i, cur) not in d: # 搜索周围节点
                d[(i, cur)] = dfs(cur + nums[i], i + 1) + dfs(cur - nums[i], i + 1)
            return d.get((i, cur), int(cur == S))


        return dfs(0, 0)



a = Solution()
b = a.findTargetSumWays2([38,21,23,36,1,36,18,3,37,27,29,29,35,47,16,0,2,42,46,6], 14)
print(b)